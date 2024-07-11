<?php

// app/Http/Controllers/InvoiceController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Mail\SendInvoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function invoiceDetails()
    {
        // Fetch all invoice data
        $invoiceData = DB::table('owner_invoice')
        ->join('reseller_information', 'reseller_information.reseller_id', '=', 'owner_invoice.reseller_id')
        ->select('owner_invoice.*', 'reseller_information.store_name')
        ->get();
    
        // Initialize an array to hold order details for each invoice
        $orders = [];
    
        // Loop through each invoice to fetch related order details
        foreach ($invoiceData as $invoice) {
            $orderId = $invoice->order_id;
    
            // Fetch the order details
            $orderDetails = DB::table('reseller_order')
                ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
                ->join('users', 'reseller_information.user_id', '=', 'users.user_id')
                ->join('owner_invoice', 'owner_invoice.order_id', '=', 'reseller_order.order_id')
                ->select(
                    'reseller_order.*', 
                    'reseller_information.reseller_name', 
                    'users.user_email', 
                    'owner_invoice.invoice_id'
                )
                ->where('reseller_order.order_id', $orderId)
                ->first();
    
            if ($orderDetails) {
                // Fetch the order items
                $orderItems = DB::table('reseller_order_information')
                    ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
                    ->select(
                        'reseller_order_information.*', 
                        'menu.menu_name', 
                        'menu.menu_price'
                    )
                    ->where('reseller_order_information.order_id', $orderId)
                    ->get();
    
                // Attach the order items to the order details
                $orderDetails->items = $orderItems;
    
                // Add order details to orders array
                $orders[] = $orderDetails;
            }
        }
    
        // Pass invoice data and order details to the view
        return view('owner_invoice', compact('invoiceData', 'orders'));
    }
    
 
    public function show($invoiceId)
    {
        // Fetch the invoice data
        $invoiceData = DB::table('owner_invoice')
            ->join('reseller_information', 'reseller_information.reseller_id', '=', 'owner_invoice.reseller_id')
            ->select('owner_invoice.*', 'reseller_information.store_name')
            ->where('invoice_id', $invoiceId)
            ->first();
        
        if (!$invoiceData) {
            abort(404, 'Invoice not found');
        }
    
        // Fetch the order details
        $orderDetails = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('users', 'reseller_information.user_id', '=', 'users.user_id')
            ->join('owner_invoice', 'owner_invoice.order_id', '=', 'reseller_order.order_id')
            ->select(
                'reseller_order.*', 
                'reseller_information.reseller_name', 
                'users.user_email', 
                'owner_invoice.invoice_id'
            )
            ->where('reseller_order.order_id', $invoiceData->order_id)
            ->first();
        
        if (!$orderDetails) {
            abort(404, 'Order details not found');
        }
    
        // Fetch the order items
        $orderItems = DB::table('reseller_order_information')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select(
                'reseller_order_information.*', 
                'menu.menu_name', 
                'menu.menu_price'
            )
            ->where('reseller_order_information.order_id', $invoiceData->order_id)
            ->get();
    
        // Attach the order items to the order details
        $orderDetails->items = $orderItems;
    
        // Pass the data to the view
        return view('order_invoice', compact('invoiceData', 'orderDetails'));
    }
    
    


    public function sendInvoice($email)
    {
        // Generate PDF
        $pdf = $this->generateInvoicePDF();

        // Save PDF to storage
        $filename = 'invoice_' . time() . '.pdf';
        Storage::disk('public')->put('invoices/' . $filename, $pdf->output());

        // Send email with PDF attached
        Mail::to($email)->send(new SendInvoice($filename));

        // Optionally, you can delete the PDF file after sending the email
        Storage::disk('public')->delete('invoices/' . $filename);

        return 'Invoice sent successfully!';
    }

    private function generateInvoicePDF()
    {
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        $html = view('invoice')->render();
        $pdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF (important for DomPDF)
        $pdf->render();

        return $pdf;
    }
}
