<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    </head>
    <body class="bg-gray-100 min-h-screen flex items-center justify-center text-xl">
            <div class="flex shadow bg-white rounded">
                <div class="p-10 bg-gray-900 text-gray-100 flex items-center justify-center flex-col">
                    <svg class="w-16 h-16 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M158.87.15c-16.16-1.52-31.2 8.42-35.33 24.12l-14.81 56.27c187.62 5.49 314.54 130.61 322.48 317l56.94-15.78c15.72-4.36 25.49-19.68 23.62-35.9C490.89 165.08 340.78 17.32 158.87.15zm-58.47 112L.55 491.64a16.21 16.21 0 0 0 20 19.75l379-105.1c-4.27-174.89-123.08-292.14-299.15-294.1zM128 416a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm48-152a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm104 104a32 32 0 1 1 32-32 32 32 0 0 1-32 32z"/>
                    </svg>
                </div>
                <div class="p-4 flex flex-col justify-between" style="width: 30em">
                    <h1 class="text-2xl font-light text-red-400">Something went wrong!</h1>
                    <div class="flex-grow text-gray-700 py-4 text-lg">
                        <p>{{ $error->message }}</p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a class="rounded-sm bg-gray-400 text-gray-600 hover:bg-gray-800 hover:text-gray-200 px-2 py-1 ml-2" href="{{ url()->previous() }}">Back</a>
                        <a class="rounded-sm bg-gray-400 text-gray-600 hover:bg-gray-800 hover:text-gray-200 px-2 py-1 ml-2" href="/errors">View errors</a>
                    </div>
                </div>
            </div>
    </body>
</html>



