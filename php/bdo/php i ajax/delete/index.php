<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../../../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>PHP FORMS 1</title>
    <style>
        #customers {
            height: 500px;
        }

        td {
            text-align: center;
        }

        #form_id {
            display: none;
        }

        tr:hover {
            background-color: yellow;
        }

        table.table-striped tbody tr.highlight {
            background-color: rgb(3, 252, 86);
        }

        ul {
            margin-left: 15%;
            text-align: center;
            list-style-type: none;
        }

        li {
            background-color: lightgray;
        }

        #taulaOrders, #taulaOrderDetails {
            display: none;
        }

        .info {
            margin-top: 40px;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <h3 style="text-align: center;">Suppliers</h3>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Empresa</th>
            <th scope="col" class="text-center">Contacte</th>
            <th scope="col" class="text-center">-</th>
        </tr>
        </thead>
        <tbody id="tbody">
            <?php 

                $con = new mysqli("localhost", "root", "", "northwind");

                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $sql = "DELETE FROM suppliers where SupplierID = ".$id;

                    if ($con->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $con->error;
                    }
                }

                $query = "SELECT * from suppliers";

                $result = $con->query($query);

                while($supplier = $result->fetch_assoc())
                {
                    echo utf8_encode("<tr><td>".$supplier['CompanyName']."</td><td>".$supplier['ContactName']."</td><td><a href='index.php?id='".$supplier['SupplierID'].">Eliminar</a></td></tr>");
                }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'getProducts.php',
            method: 'GET',
            success: function (result) {
                $("#tbody").html(result);
            }
        });
    });
</script>
</body>

</html>
