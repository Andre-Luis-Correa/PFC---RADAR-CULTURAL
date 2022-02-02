<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../assets/css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../assets/css/admin.css">

        <title>Admin Section - Manage Users</title>
    </head>

    <body>
        
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add User</a>
                    <a href="index.php" class="btn btn-big">Manage Users</a>
                </div>
                <div class="content">
                    <h2 class="page-title">Manage Users</h2>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                    <h1> Colaboradores </h1>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($admin_users as $key => $user): ?>
                                <tr>
                                    <?php if ($user['id_usuario'] != $_SESSION['id_usuario']): ?>
                                        <td><?php  echo $key + 1; ?></td>
                                        <td><?php echo $user['nome_usuario']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><a href="edit.php?edit_id_colaborador=<?php echo $user['id_usuario']; ?>" class="edit">edit</a></td>
                                        <td><a href="index.php?delete_id_colaborador=<?php echo $user['id_usuario']; ?>" class="delete">delete</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <h1> Leitores </h1>
                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($read_users as $key => $user): ?>
                                <tr>
                                    <td><?php  echo $key + 1; ?></td>
                                    <td><?php echo $user['nome_usuario']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><a href="edit.php?edit_id_leitor=<?php echo $user['id_usuario']; ?>" class="edit">edit</a></td>
                                    <td><a href="index.php?delete_id_leitor=<?php echo $user['id_usuario']; ?>" class="delete">delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="../../assets/js/scripts.js"></script>

    </body>

</html>