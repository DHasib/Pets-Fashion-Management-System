<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Items Purchase successful</title>
</head>
<body>
      <h3>Thank you for purchasing Pets And Products From  Pets Fashion Online Shop</h3>
      <h4>Below Show Your Order Details-</h4>


      
          <div class="card-body table-responsive p-0" id="result">
                  <table class="table table-head-fixed">
                   
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Items Title</th>
                        <th>Type</th>
                        <th>Quentity</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
      
                  @if(isset($pets) && $pets->count() > 0)
                

                      <?php  $i=1; ?>
                        @foreach ($pets as $pet)
                        <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $pet->name }}</td>
                              <td>Pet</td>
                              <td>{{ $pet->qty }}</td>
                              <td>{{ $pet->price }}</td>
                        </tr>
                        @endforeach
                   @endif

                   @if(isset($products) && $products->count() > 0)
              
                   <?php  $i=1; ?>
                     @foreach ($products as $product)
                     <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $product->name }}</td>
                           <td>Product</td>
                           <td>{{ $product->qty }}</td>
                           <td>{{ $product->price }}</td>
                     </tr>
                     @endforeach
                @endif
      
                    </tbody>
                  </table>
                </div>
                <br><br><br><br>
       <p>
           <Ul>
              <li>
                    Your Order Will be reached on your hand Within 24 hours.<br>
              </li>
              <li>
                    Contact Us- 0187-885-4874
              </li>
              <li>
                    Email- petsfashionbd@gmail.com
              </li>
              <li>
                    Location - Road # 05, Shop # 31, Katabon, Dhaka 1230 
              </li>
           </Ul>
      </p>
</body>
</html>