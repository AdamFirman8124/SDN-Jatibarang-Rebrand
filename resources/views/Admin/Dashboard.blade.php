@extends('Layouts.AdminLayouts')

@section('content')
    <div class="p-6">
        <div class="flex flex-wrap gap-4 justify-evenly">
            <!-- Total Revenue Card -->
            <div class="flex items-center">
                <div class="bg-blue-500 rounded-full p-3 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z">
                        </path>
                    </svg>
                </div>
                <div>
                    <div class="text-gray-500 text-sm font-medium">TOTAL REVENUE</div>
                    <div class="text-3xl font-bold">46,5 M</div>
                </div>
            </div>

            <!-- Total Profit Card -->
            <div class="flex items-center">
                <div class="bg-blue-500 rounded-full p-3 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M3 3v18h18V3H3zm16 16H5V5h14v14zM7 10h2v7H7v-7zm4-3h2v10h-2V7zm4 6h2v4h-2v-4z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-gray-500 text-sm font-medium">TOTAL PROFIT</div>
                    <div class="text-3xl font-bold">22,3 M</div>
                </div>
            </div>

            <!-- Total Sales Card -->
            <div class="flex items-center">
                <div class="bg-blue-500 rounded-full p-3 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-gray-500 text-sm font-medium">TOTAL SALES (Qty)</div>
                    <div class="text-3xl font-bold">7.467</div>
                </div>
            </div>
        </div>
    </div>
@endsection
