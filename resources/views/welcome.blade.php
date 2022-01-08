<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/image/logo.png">
    <title>Tutorial System</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .hero {
            height: 60vh;
            background-image: url('/image/hero-welcom.png');
            background-repeat: no-repeat;
            background-position: bottom;
        }
        @media only screen and (min-width: 1000px) {
            .hero {
                background-size: 100%;
            }
        }
    </style>
</head>
<body>
    
    <section class="hero bg-success grid md:grid-cols-2 relative">
        <div class="w-16 md:w-24 h-16 md:h-24 rounded-full overflow-hidden absolute top-5 left-5">
            <img src="/image/logo.png" alt="logo">
        </div>
        <div class="flex flex-col justify-center space-y-10 pt-10 md:pt-0">
            <h1 class="text-white font-black text-3xl md:text-5xl space-y-2 flex flex-col text-center">
                <span>
                Read Modules 
                </span>
                <span class="">
                &
                </span>
                <span>
                Watch Videos
                </span>
            </h1>
            <a href="/login" class="w-max mx-auto">
            <button class="bg-white py-3 px-5 rounded-md shadow-md w-max m-auto bg-yellow-300 text-gray-600 font-bold hover:bg-yellow-400 transition-all">
                Learn Now
            </button>
            </a>
        </div>
        <div class="h-48 sm:h-60 md:h-72 w-4/6 bg-white shadow-xl m-auto rounded-md pt-4 pl-4" style="background-image: url('/image/hero-login.jpeg'); background-size: cover; background-repeat: no-repeat;">
            <!-- <img class="w-4/6 ml-auto" src="/image/hero-teacher.svg" alt="teacher"> -->
        </div>
        
    </section>

    <section class="grid lg:grid-cols-3 p-5 px-16 gap-10 max-w-md lg:max-w-full mx-auto">
        <div class="bg-white w-full h-60 shadow-xl rounded-md border border-blue-50 flex flex-col justify-center space-y-5 px-10">
            <div class="w-24 h-24 rounded-full mx-auto bg-yellow-500 flex p-3">
                <img class="m-auto" src="/image/feature1.svg" alt="">
            </div>
            <h6 class="text-center text-gray-500 text-md mx-auto">Programming Languages modules and video.</h6>
        </div>
        <div class="bg-white w-full h-60 shadow-xl rounded-md border border-blue-50 flex flex-col justify-center space-y-5 px-10">
            <div class="w-24 h-24 rounded-full mx-auto bg-yellow-500 flex p-3">
                <img class="m-auto" src="/image/feature2.svg" alt="">
            </div>
            <h6 class="text-center text-gray-500 text-md mx-auto">Start reading and watching videos about your favorite programming language to learn more</h6>
        </div>
        <div class="bg-white w-full h-60 shadow-xl rounded-md border border-blue-50 flex flex-col justify-center space-y-5 px-10">
            <div class="w-24 h-24 rounded-full mx-auto bg-yellow-500 flex p-3">
                <img class="m-auto" src="/image/feature3.svg" alt="">
            </div>
            <h6 class="text-center text-gray-500 text-md mx-auto">DFCAMPLP-IT Campus module and video tutorial system</h6>
        </div>
    </section>

</body>
</html>