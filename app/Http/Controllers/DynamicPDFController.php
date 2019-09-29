<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DynamicPDFController extends Controller
{

    //to get total Sales Amount  from database...........................................................................................................
          public function total_amount()
            {
                $total_price = DB::table('payment_details')
                                ->select(DB::raw('SUM(received_amount)  as taka'))
                                ->get();
                    return $total_price;
            }
    //to get TotalSales Report fronm database.............................................................................................................
         public function total_sales()
            {
                $product = DB::table('users')
                                ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('products', 'order_lists.item_id', '=', 'products.id')
                                ->select( 'order_lists.type', 'order_lists.quentity', 'products.title',  'order_lists.total_price',  'payment_details.created_at')       
                                ->where('order_lists.type', '=',  'product')
                                ->latest();
                            
                $pet   = DB::table('users')
                                ->join('order_lists', 'users.id', '=', 'order_lists.user_id')
                                ->join('order_details', 'order_lists.id', '=', 'order_details.order_list_id')
                                ->join('payment_details', 'order_details.payment_details_id', '=', 'payment_details.id')
                                ->join('pets', 'order_lists.item_id', '=', 'pets.id')
                                ->select( 'order_lists.type', 'order_lists.quentity', 'pets.title','order_lists.total_price',  'payment_details.created_at')                       
                                ->where('order_lists.type', '=',  'pet')
                                ->union($product)
                                ->latest()
                                ->get();

                      return $pet;
            }
      //To convert HTML to PDF ......................................................
         public function pdf()
            {
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($this->convert_sales_data_to_html());
                    return $pdf->stream();
            }

         public function convert_sales_data_to_html()
           {

                 
                  $sales_data = $this->total_sales();
                  $sales_amount = $this->total_amount();
                  $output = '
                  <h2 align="center">Pets fashion Online Shop </h2>
                  <h3 align="center">Total Sales Report PDF File</h3>
                  <div class="card-body table-responsive p-0" style="height:500px;" id="result">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Item Type</th>
                        <th>Title</th>
                        <th>quentity</th>
                        <th>Sub-total </th>
                        <th>Sale Time</th>

                      </tr>
                    </thead>
                    <tbody>
                    ';  
                     $i=1; 
                    foreach($sales_data as $sale)
                    {
                      $output .= '

                            <tr>
                                <td> '.$i++.' </td>
                                <td>'.$sale->type.' </td> 
                                <td> '.$sale->title.' </td> 
                                <td> '.$sale->quentity.' </td>
                                <td>  '.$sale->total_price.'  </td>
                                <td> <time class="published" datetime="2016-04-17 12:00:00">
                                     '.$sale->created_at.'  </time> </td>
                            </tr>
                            
                            ';  
                    }
                    $output .= '

                        </tbody>
                            <tfoot>
                                <tr>
                                            <td colspan="3" class="hidden-xs"></td>
                                            <td colspan="1" > <strong>Total Amount-</strong></td>
                                            ';
                                        foreach ($sales_amount as $total)
                                        {
                                            $output .= '
                                            <td colspan="1" >   <strong style="color:black; font-size:20px;">   '.$total->taka.' </strong>/= </td>
                                            ';
                                        }
                                        $output .= '
                                </tr>
                            </tfoot>
                        ';

                        $output .= '</table>';
                        return $output;


           }

}
