<h1>Créer un compte</h1>

<div id="form-register">
    <form action="/index.php?c=user&a=register" onsubmit="return validateForm()" method="post" name="formRegister" id="register">
        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password-repeat">Password repeat</label>
                <input type="password" name="password-repeat" id="password-repeat">
            </div>
        </div>

        <input type="submit" value="Créer un compte" name="save" class="save">
    </form>
</div>
