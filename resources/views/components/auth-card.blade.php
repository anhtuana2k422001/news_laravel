<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-100">
    <div>
        {{ $logo }}
    </div>

    <div style="background: linear-gradient(  #12c2e9, #c471ed, #f64f59) !important;"  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
