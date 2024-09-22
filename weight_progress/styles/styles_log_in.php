<style>
    * {
        margin: 0;
        padding: 0;
        color: white;
        font-size: 17px;
        font-family: 'Cascadia Code PL', monospace;
    }

    h1 {
        font-size: 30px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    form {
        border: 1px black solid;
        padding: 60px;
        border-radius: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        position: relative;
    }

    form .separator {
        padding: 20px;
    }

    form input {
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        height: 30px;
        border-radius: 8px;

    }

    form button {
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        height: 40px;
        cursor: pointer;
        border-radius: 8px;
        padding: 2px;

        &:hover {
            background-color: rgba(0, 0, 0, 0.7);

        }

    }

    form a {
        text-decoration: none;
    }

    form .buttons {
        display: flex;
        gap: 20px;
    }



    body {
        background-image: url("images/purple_forest.jpg");
        background-size: cover;
        backdrop-filter: blur(4px);
    }

    .red {
        color: red;
    }

    .login_message{
        margin-top: 10px;
    }

</style>