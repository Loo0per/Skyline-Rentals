function loadData(data) {
    if (data == "btn1") {
        document.getElementById("getform").innerHTML = `<div class="blur-bg-overlay"></div>
        <div class="form-popup">
        
            <div class="form-box login">
                <div class="form-details">
                    <h2>Welcome Back</h2>
                    <p align="center"><b>Please log in using your personal information to stay connected with us.</b></p>
                </div>
                <div class="form-content">
                    <h2 style="margin-right: 280px;">USER LOGIN</h2>
                    <form method="POST" id="getform" action="userlogin.php">
                        <div class="input-field">
                            <input type="text" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <a href="#" class="forgot-pass-link">Forgot password?</a>
                        <br>
                        <button type="submit" name="submit">Log In</button>
                    </form>
                    <div class="bottom-link">
                        Don't have an account?
                        <a href="Register.php" id="signup-link">Signup</a>
                    </div>
                   
                </div>
            </div>`
        ;
    } else if (data == "btn2") {
        document.getElementById("getform").innerHTML = `<div class="blur-bg-overlay"></div>
        <div class="form-popup">
        
            <div class="form-box login">
                <div class="form-details">
                    <h2>Welcome Back Admin</h2>
                   
                </div>
                <div class="form-content">
                    <h2 style="margin-right: 280px;">Admin LOGIN</h2>
                    <form method="POST" id="getform" action="adminlogin.php">
                        <div class="input-field">
                            <input type="text" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <a href="#" class="forgot-pass-link">Forgot password?</a>
                        <br>
                        <button type="submit" name="submit">Log In</button>
                    </form>
                   
                    
                </div>
            </div>`;
    }  else {
        alert("Invalid");
    }
}