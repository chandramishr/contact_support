<!DOCTYPE html>
<html>
<head>
    <title>Contact & Support</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center fw-bold">Contact & Support</div>
                <div class="card-body">
                    <form action="submit.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="number" name="mobile_no" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Upload Image (JPEG only, max 500KB)</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
