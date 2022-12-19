<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Usign Ajax</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url() ?>/custom-css/style.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <input id="csrf" type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <div class="form-header mb-3 text-center">
                    <h1>Sign up to Mehub</h1>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="">
                            <h6 class="text-center my-0">Already have an Account? <a href="<?= base_url() ?>">Sign In</a></h6>
                        </div>
                    </div>
                </div>
                <?php if (session()->get('error')) : ?>
                    <div id="alert" class="alert alert-danger" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif ?>
                <div class="card mb-3">
                    <div class="card-body row">
                        <form id="form">
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name">

                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" id="bdate" name="bdate">
                                </div>
                                <div class="col-6 mb-3 ">
                                    <label for="" class="form-label">Sex</label>
                                    <select class="form-select" id="sex" name="sex">
                                        <option selected value="">Choose...</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                    <small id="sex_err" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                            </div>
                            <div class="mb-3 d-grid gap-2">
                                <button type="submit " class="btn btn-success" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= base_url() ?>/custom-js/register.js"></script>


</body>

</html>