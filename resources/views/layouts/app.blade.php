<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>sinnbeck.dev - @yield('title')</title>
    <link href="{{cache_bust('/css/app.css')}}" rel="stylesheet"/>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @include('feed::links')
</head>
<body class="bg-slate-100">
<div class="hidden mb-8 border-b bg-slate-900 border-amber-500 ">
    <div class="max-w-4xl py-5 mx-auto text-4xl uppercase text-amber-300">sinnbeck.dev</div>
    <nav class="max-w-4xl mx-auto">
        <a href="/" class="text-amber-300 hover:text-amber-100">Home</a>
    </nav>
</div>
<div class="relative mb-10 bg-white border-b-2 border-indigo-600 ">
    <div class="max-w-5xl px-4 mx-auto sm:px-6">
        <div class="flex flex-col items-center justify-between py-6 lg:flex-row lg: md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="/" class="flex items-center gap-3 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <span class="inline-block text-3xl font-logo">sinnbeck.dev</span>
                </a>
            </div>
            <nav class="flex space-x-10 md:flex">
                <div class="relative">
                    <a href="/backlinks" class="inline-flex items-center text-xl font-medium text-gray-500 bg-white rounded-md lg:text-base group hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                        <span>Backlinks</span>
                    </a>
                    |
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <a href="/" class="inline-flex items-center text-xl font-medium text-gray-500 bg-white rounded-md lg:text-base group hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                        <span>Home</span>
                    </a>



                </div>
            </nav>
        </div>
    </div>

</div>
<div class="container max-w-4xl px-4 mx-auto">
    @yield('content')
</div>
<script>

const copyButtonLabel = "Copy Code";
const copyButtonLabel2 = `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
</svg>
`

let blocks = document.querySelectorAll("pre");

blocks.forEach((block) => {
  // only add button if browser supports Clipboard API
  if (navigator.clipboard) {
    let button = document.createElement('button');
    button.innerHTML = copyButtonLabel;
    button.addEventListener('click', copyCode);
    block.appendChild(button);
  }
});

async function copyCode(event) {
  const button = event.srcElement;
  const pre = button.parentElement;

  let code = pre.querySelector('code');
  let lines = [].slice.call(code.children);
  let texts = []
  lines.forEach(function(item) {
      let parts = [].slice.call(item.children);
      let temp = ''
      parts.forEach(function(part) {
        if (!part.classList.contains('line-number')) {
            temp += part.innerText
        }
        
      })
      texts.push(temp)
    
      
  })

  const final = texts.join("\n")
  let text = code.innerText;
  await navigator.clipboard.writeText(final);
  
  button.innerText = "Code Copied";
  
  setTimeout(()=> {
    button.innerText = copyButtonLabel;
  },1000)
}
</script>
</body>
</html>
