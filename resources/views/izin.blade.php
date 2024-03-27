@include('layout.kp')

<div class="flex flex-row justify-center">
    <h1 class="mr-2">
        hai bang, ayo izin sama gw
    </h1>
    <a href="{{ url('presensi') }}">
        <button class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-xl">
            Back
        </button>
    </a>
</div>

<form class="max-w-sm mx-auto mt-4 ">

    <label for="countries" class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Pilih tipe izin</label>
    <select id="countries" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option>Sakit</option>
      <option>Telat</option>
      <option>Lain-lain</option>
    </select>
    
    <m class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Input tanggal Izin</m>
    <div class="relative max-w-sm mb-4">
        
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </div>
        <input datepicker id="datepicker" datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih tanggal">
    </div>

    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan izin</label>
    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
  

</form>


{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
@include('layout.kk')
  