{{-- success toast notif --}}
@if (session()->has('message'))
<x-success-toast :message="session()->get('message')"/>
@endif

{{-- end toast --}}
<div class="w-full overflow-hidden rounded-lg shadow-xs">

  <div class="w-full overflow-x-auto">

    <table class="w-full whitespace-no-wrap">

      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
          <th class="px-4 py-3">User</th>
          <th class="px-4 py-3">User Type</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Date Joined</th>
          <th class="px-4 py-3">Permit</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody
        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
      >
     @forelse ($owners as $owner)
     <tr class="text-gray-700 dark:text-gray-400">
      <td class="px-4 py-3">
        <div class="flex items-center text-sm">
          <!-- Avatar with inset shadow -->
          <div>
            <p class="font-semibold">{{$owner->name}}</p>
            <p class="text-xs text-gray-600 dark:text-gray-400">
              {{$owner->address}}
            </p>
          </div>
        </div>
      </td>
      <td class="px-4 py-3 text-sm">
      owner
      </td>
      <td class="px-4 py-3 text-xs">
        @if ($owner->approved)
        <span
          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
        >
        {{$owner->approved ? 'approved' : 'pending'}}
        </span>
        @else
        <span
          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
        >
        {{$owner->approved ? 'approved' : 'pending'}}
        </span>

        @endif
      </td>

      <td class="px-4 py-3 text-sm">
        {{ \Carbon\Carbon::parse($owner->created_at)->isoFormat('MMM Do YYYY') }}

      </td>

    <td  class="px-4 py-3 text-sm">
     {{-- Permit Icon --}}
     <a href="#permit_data_{{$owner->id}}"
        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
        aria-label="Permit"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m-7 4h8a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </a>
    {{-- modal permit --}}
      <div class="modal" role="dialog" id="permit_data_{{$owner->id}}">
        <div class="modal-box">

          <img src="{{asset('storage/'.$owner->business_permit)}}" alt="">
          <div class="modal-action">
            <a href="#" class="btn">back</a>
          </div>
        </div>
      </div>
    </td>

      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">


          {{-- Approve or View Data --}}
          @if (!$owner->approved)
          <a href="#owner_data_{{$owner->id}}"
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
            aria-label="Approve"
          >
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 122.877 101.052" class="w-5 h-5">
              <g><path d="M4.43,63.63c-2.869-2.755-4.352-6.42-4.427-10.11c-0.074-3.689,1.261-7.412,4.015-10.281 c2.752-2.867,6.417-4.351,10.106-4.425c3.691-0.076,7.412,1.255,10.283,4.012l24.787,23.851L98.543,3.989l1.768,1.349l-1.77-1.355 c0.141-0.183,0.301-0.339,0.479-0.466c2.936-2.543,6.621-3.691,10.223-3.495V0.018l0.176,0.016c3.623,0.24,7.162,1.85,9.775,4.766 c2.658,2.965,3.863,6.731,3.662,10.412h0.004l-0.016,0.176c-0.236,3.558-1.791,7.035-4.609,9.632l-59.224,72.09l0.004,0.004 c-0.111,0.141-0.236,0.262-0.372,0.368c-2.773,2.435-6.275,3.629-9.757,3.569c-3.511-0.061-7.015-1.396-9.741-4.016L4.43,63.63 L4.43,63.63z"/></g>
            </svg>

            <div class="modal modal-bottom sm:modal-middle" role="dialog" id="owner_data_{{$owner->id}}">
              <div class="modal-box flex flex-col text-white">
                <a href="#" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</a>
                <h3 class="text-lg font-bold">{{$owner->name}}'s Data!</h3>
                <p class="py-4">Name: {{$owner->name}}</p>
                <p class="py-4">email: {{$owner->email}}</p>
                <p class="py-4">Mobile Number: {{$owner->mobile_number}}</p>
                <p class="py-4">Address: {{$owner->address}}</p>
                <div class="modal-action">
                  <a href="#" class="btn hover:bg-red-600">Reject</a>
                  <form action="{{ route('owner.approve', $owner->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn hover:bg-green-600">Accept</button>
                  </form>
                </div>
              </div>
            </div>
          </a>
          @else
          <a href="#owner_data_{{$owner->id}}"
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
            aria-label="View">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
             <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
           </svg>
         </a>

         <div class="modal modal-bottom sm:modal-middle" role="dialog" id="owner_data_{{$owner->id}}">
           <div class="modal-box flex flex-col bg-gray-900 text-white"> <!-- Set background to dark and text to white -->
             <a href="#" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-white">✕</a> <!-- White close button -->
             <h3 class="text-lg font-bold">{{$owner->name}}'s Data!</h3>
             <p class="py-4">Name: {{$owner->name}}</p>
             <p class="py-4">Email: {{$owner->email}}</p>
             <p class="py-4">Mobile Number: {{$owner->mobile_number}}</p>
             <p class="py-4">Address: {{$owner->address}}</p>
             <div class="modal-action">
               <a href="#" class="btn hover:bg-red-600 text-white color-red">Back</a> <!-- Ensure button text is white -->
             </div>
           </div>
         </div>

          @endif

          {{-- Delete --}}
         <form action="{{route('delete.owner.admin', $owner->id)}}" method="post">@csrf
          <button
          class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
          aria-label="Delete"
        >
          <svg class="w-5 h-5" fill="red" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H5a1 1 0 100 2h10a1 1 0 100-2h-2.382l-.724-1.447A1 1 0 0011 2H9zm-4 6a1 1 0 011-1h8a1 1 0 011 1v7a2 2 0 01-2 2H7a2 2 0 01-2-2V8z" clip-rule="evenodd"/>
          </svg>
        </button>
         </form>
        </div>
      </td>
    </tr>
    @empty
      <tr>
        <td colspan="5" class="px-4 py-3 text-center">No owners found.</td>
      </tr>
    @endforelse
      </tbody>
    </table>
  </div>

</div>
