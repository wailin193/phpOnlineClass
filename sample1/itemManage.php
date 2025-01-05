<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h1 class="text-primary text-center my-3">Insert Item</h1>
            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Name</label>
                </div>
                <div class="col-md-5 col-12">
                    <input type="text" name="itemname" class="form-control" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Description</label>
                </div>
                <div class="col-md-5 col-12">
                    <textarea name="itemdescription" id="" rows="7" class="form-control"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Price</label>
                </div>
                <div class="col-md-5 col-12">
                <input type="number" name="itemprice" class="form-control" min="100" max="999999" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Image</label>
                </div>
                <div class="col-md-5 col-12">
                <input type="file" name="itemimage" class="form-control" required>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" value="Insert Item" class = "btn btn-primary" name="btnitem">
                <input type="reset" value="Clear" class="btn btn-warning">
            </div>
        </form>
    </div>
</body>
</html>