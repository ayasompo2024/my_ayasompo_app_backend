<link rel="stylesheet" href="{{ asset('admin/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css" />
<link href="{{ asset('admin/images/logo.svg') }}" rel="icon" type="image/x-icon">
<style>
    * {
        font-family: serif;
    }

    .loader {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: block;
        margin: 15px auto;
        position: relative;
        color: rgb(158, 151, 171);
        left: -100px;
        box-sizing: border-box;
        animation: shadowRolling 2s linear infinite;
    }

    @keyframes shadowRolling {
        0% {
            box-shadow: 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
        }

        12% {
            box-shadow: 100px 0 blueviolet, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
        }

        25% {
            box-shadow: 110px 0 blueviolet, 100px 0 blueviolet, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
        }

        36% {
            box-shadow: 120px 0 blueviolet, 110px 0 blueviolet, 100px 0 blueviolet, 0px 0 rgba(255, 255, 255, 0);
        }

        50% {
            box-shadow: 130px 0 blueviolet, 120px 0 blueviolet, 110px 0 blueviolet, 100px 0 blueviolet;
        }

        62% {
            box-shadow: 200px 0 rgba(255, 255, 255, 0), 130px 0 blueviolet, 120px 0 blueviolet, 110px 0 blueviolet;
        }

        75% {
            box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 blueviolet, 120px 0 blueviolet;
        }

        87% {
            box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 blueviolet;
        }

        100% {
            box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0);
        }
    }
</style>
