<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Betsy -Factura-</title>
  <style>

    body {
    font-family: Arial, sans-serif;
      color: #272727;
      color: #363636; 
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .invoice {
      margin: 0 auto;
      max-width: 800px;
      padding: 20px;
      border: 1px solid #ccc;
      min-width: 50vw;
    }
    
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .invoice-details {
      margin-bottom: 40px;
    }
    
    .invoice-details p {
      margin: 5px 0;
    }
    
    .item-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .item-table th,
    .item-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    
    .total {
      text-align: right;
      font-weight: bold;
    }

    .btnPago{
        background-color: green;
        border:none;
        padding: 5px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="invoice">
    <div class="header">
      <img src="https://th.bing.com/th/id/R.a8bd4bd56de56d0e2dd7a5a7b3a59174?rik=q50npXcW%2fwQ15Q&pid=ImgRaw&r=0" alt="betsy-company" width="100px" height="200px" style="object-fit: contain"/>
      <h2>Factura</h2>
    </div>
    
    <div class="invoice-details">
      <p style="text-transform: capitalize"><strong>Cliente:</strong> <?php echo session()->get('fullname') ?></p>
      <p><strong>Fecha:</strong> <?php echo $header['sale_createdAt'] ?></p>
      <p><strong>Factura ID:</strong> <?php echo $header['saleheaderId'] ?> </p>
      <p><strong>Estado:</strong> <button class="btnPago">pagado</button></p>
    </div>
    
    <table class="item-table">
      <thead>
        <tr>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Talla</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $product): ?>
            <tr>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['cantidad'] ?></td>
                <td>$<?php echo $product['sale_price'] ?></td>
                <td><?php echo $product['sale_size'] ?></td>
                <td>$<?php echo $product['sale_price'] * $product['cantidad']  ?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class="total">Total:</td>
          <td>$<?php echo $header['total_venta']?></td>
        </tr>
      </tfoot>
    </table>
  </div>

  
<script>
    
    document.title = "Mi Factura -Betsy-"

    function downloadFactura() {
        const factura = document.documentElement.outerHTML;
        const element = document.createElement('a');
        element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(factura));
        element.setAttribute('download', 'factura.html');
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    }

    (() => {
        if(window.location.host !== ""){
            downloadFactura();
            window.close();
        }
    })()
</script>

</body>
</html>