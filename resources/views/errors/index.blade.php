<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    </head>
    <body class="bg-gray-100">
    <div class="fixed shadow-md bg-gray-200 pin-t pin-r pin-l w-full">
        <div class="mx-auto container px-4 flex items-center justify-between">
            <div class="flex">
                
                <a class="text-gray-600 hover:text-gray-800 px-2 py-4" href="/">Home</a>
                <a class="text-gray-600 hover:text-gray-800 px-2 py-4" href="/thrown">Throw Custom Exception</a>
                <a class="text-gray-600 hover:text-gray-800 px-2 py-4" href="/wrapped">Wrap any exception</a>
            </div>
            <div class="">
                <a href="https://github.com/bearcodi/laravel-exception-handling-fun"
                    class="text-gray-600 hover:text-gray-800">
                    
                    <svg class="fill-current h-8 w-8" viewBox="0 0 16 16" version="1.1" ><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
                    
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto p-4 pt-20">
        <div class="flex items-center">
            <h1 class="text-xl font-light uppercase text-gray-700">Recorded errors</h1>
            <div class="ml-4 rounded-sm text-xs py-1 px-2 bg-red-400 text-red-100">{{ $errors->count() }}</div>
        </div>
        @forelse ($errors as $error)
        <div id="stacktrace-{{$error->id}}" class="mt-4 rounded shadow bg-white card">
            <div class="flex items-top justify-between border-b border-grey-400 p-2">
                <div class="flex">
                    <div>
                        
                        <p class="text-gray-600 font-bold rounded-sm py-1 px-2 bg-gray-200">{{ $error->code }}</p>
                    </div>
                    <h1 class="py-1 ml-2 text-gray-800">{{ $error->message }}</h1>
                </div>
                <div class="text-gray-600 py-1 w-1/5 text-right">
                    {{ $error->created_at->diffForHumans() }}
                </div>
            </div>
            <div class="p-2">
                <div class=" p-2 h-64 overflow-auto rounded shadow-md bg-gray-700 text-gray-100 stacktrace">
                    {!! nl2br($error->trace) !!}
                </div>
                <div class="flex text-gray-600 justify-between mt-2">
                    <p><strong>FILE</strong> {{ $error->file }}</p>
                    <p class="ml-2"><strong>LINE</strong> {{ $error->line }}</p>
                </div>
            </div>
        </div>
        @empty
        <h1>No errors to report!</h1>
        @endforelse
    </div>
    </body>
</html>