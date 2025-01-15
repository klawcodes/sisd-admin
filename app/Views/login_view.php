<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 col-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                LOGIN
            </div>
            <div class="card-body">
                <!-- Form dengan method POST yang eksplisit -->
                <form method="POST" action="<?= base_url('login') ?>" autocomplete="off">
                    <!-- CSRF Token -->
                    <?= csrf_field() ?>
                    
                    <!-- Username field -->
                    <div class="mb-3">
                        <label for="member_username" class="form-label">Username</label>
                        <input type="text" 
                               id="member_username"
                               name="member_username" 
                               class="form-control">
                    </div>

                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="member_password" class="form-label">Password</label>
                        <input type="password" 
                               id="member_password"
                               name="member_password" 
                               class="form-control">
                    </div>

                    <!-- Submit button -->
                    <div class="mb-3">
                        <button type="submit" name="submit" value="1" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </form>

                <!-- Debug Information -->
                <div class="mt-3 border-top pt-3">
                    <small>Debug Info:</small>
                    <pre>
                    <?php 
                    echo "Current URL: " . current_url() . "\n";
                    echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "\n";
                    echo "Form Action: " . base_url('login') . "\n";
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo "POST Data:\n";
                        print_r($_POST);
                    }
                    ?>
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk debugging -->
    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        console.log('Form is submitting...');
        // Uncomment baris di bawah untuk melihat data yang dikirim
        // e.preventDefault();
        const formData = new FormData(this);
        console.log('Form data:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
    });
    </script>
</body>
</html>