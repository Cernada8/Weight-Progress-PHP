<style>
    h1 {
        color: blueviolet;
    }

    h3 {
        font-size: 20px;
        color: blueviolet;

        &.red {
            color: red;
        }

        &.green {
            color: green;
        }
    }

    h2 {
        font-size: 25px;
        color: blueviolet;

        &.red {
            color: red;
        }

        &.green {
            color: green;
        }
    }

    h5 {
        color: blueviolet;

        &.red {
            color: red;
        }

        &.green {
            color: green;
        }
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'Cascadia Code PL', monospace;
        overflow: hidden;
    }

    body {
        background-color: #333333;
    }

    .formContainer {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .formContainer input {
        height: 30px;
        border: none;
        border-radius: 8px;
        width: 200px;
    }

    .formContainer div {
        padding: 10px;
    }

    .formContainer button {
        width: 150px;
        height: 30px;
        border-radius: 8px;
        border: none;
        color: blueviolet;
    }

    .formContainer button:hover {
        background-color: blueviolet;
        color: white;
        border: none;
        transition: .1s;
        scale: 1.1;
    }

    header {
        display: flex;
        height: 60px;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        top: 0;
        position: sticky;
        background-color: rgba(0, 0, 0, 0.2);
    }

    header div h1 {
        text-shadow: 0 0 2px white;
        font-size: 40px;
    }

    header form{
        padding: 10px;
    }

    header button,
    a {
        background-color: white;
        color: blueviolet;
        border: none;
        cursor: pointer;
        height: 30px;
        border-radius: 8px;
        padding: 10px;

        &:hover {
            transition: .1s;
            background-color: blueviolet;
            color: white;
            scale: 1.1;
        }
    }

    #header_form {
        display: flex;
        gap: 20px;
    }

    header a {
        text-decoration: none;
    }

    header .logo_icon i{
        color: white;
        font-size: 20px;
        padding: 10px;
    }
</style>