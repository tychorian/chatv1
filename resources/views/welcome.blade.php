<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AeternusConsulting Chat Demo</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
    @fluxAppearance
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
</head>


<body class=" font-sans antialiased bg-white dark:bg-black dark:text-white/50">

    <flux:header class="flex justify-between px-4! w-full bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-100 dark:border-white/5">

        <div x-data>
            <!-- Logo for light mode -->
            <a href="https://www.aeternusconsulting.com/"><img x-show="!$flux.dark" src="https://www.aeternusconsulting.com/wp-content/uploads/2020/10/logo-black.png" class="w-[90px]" /></a>

            <!-- Logo for dark mode -->
            <a href="https://www.aeternusconsulting.com/"><img x-show="$flux.dark" src="https://www.aeternusconsulting.com/wp-content/uploads/2023/12/logo-white.png" class="w-[90px]" /></a>
        </div>


        <h1 class="font-bold">Aeternus Consulting AI Chat Demo</h1>
        <flux:button x-data x-on:click="$flux.dark = ! $flux.dark">Light|Dark</flux:button>
    </flux:header>

    <livewire:chatlog></livewire:chatlog>

    @livewireScripts
    @fluxScripts
</body>

</html>
