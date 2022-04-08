<h1>Connexion</h1>

<div id="form-login">
    <form action="/index.php?c=user&a=connected" method="post" id="login">
        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <input type="submit" value="Se connecter" name="save" class="save">
    </form>
</div>

