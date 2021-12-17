<html lang="en">
<head>
    <title>App Name - @yield('title')</title>
    <link href="/css/app.css" rel="stylesheet"/>
</head>
<body class="bg-slate-100">
<div class="bg-slate-900 hidden border-b border-amber-500 mb-8 ">
    <div class="text-amber-300 text-4xl py-5 uppercase mx-auto max-w-4xl">sinnbeck.dev</div>
    <nav class="mx-auto max-w-4xl">
        <a href="/" class="text-amber-300 hover:text-amber-100">Home</a>
    </nav>
</div>
<div class="relative bg-white mb-10 border-b-2 border-indigo-600 ">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="/" class="flex items-center gap-3 text-indigo-600">
                    <img class="h-8 w-auto sm:h-10 hidden" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <span class="font-logo text-3xl inline-block">sinnbeck.dev</span>
                </a>
            </div>
            <nav class="hidden md:flex space-x-10">
                <div class="relative">
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <a href="/" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                        <span>Home</span>
                    </a>

                </div>
            </nav>
        </div>
    </div>

</div>
<div class="container max-w-4xl mx-auto">
    @yield('content')
</div>
</body>
</html>
