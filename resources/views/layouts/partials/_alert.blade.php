<div class="fixed bottom-0 right-0 mr-6 mb-6 z-100 alert alert-dismissible fade show p-0" role="alert">
    <div class="bg-white rounded-lg shadow-lg px-4 py-5 sm:px-6 max-w-sm relative">
        <button type="button" class="font-normal close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="flex mr-6">
            <div class="mr-3">
                <svg class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <div>
                <div class="font-bold text-gray-800">Success</div>

                <p class="text-gray-600 text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
</div>
