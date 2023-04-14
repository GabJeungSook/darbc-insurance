<div>
    <div class="flex space-x-1">
      <div class="grid place-content-center">
        <img src="{{ asset('images/darbc.png') }}" class="h-10" alt="">
      </div>
      <div>
        <h1 class="text-xl font-bold text-gray-700"> DOLEFIL AGRARIAN REFORM BENEFICIARIES COOP.</h1>
        <h1>DARBC Complex, Brgy. Cannery Site, Polomolok, South Cotabato</h1>
      </div>
    </div>

    <h1 class="text-xl mt-5 text-center font-bold text-gray-700">61 Years Old & Above Members</h1>
    <div class="mt-5 overflow-x-auto">
      <table id="example" class="table-auto mt-5" style="width:100%">
        <thead class="font-normal">
          <tr>
            <th class="border text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">MEMBER NAME
            </th>
            <th class="border text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">REPRESENTATIVE</th>
            <th class="border text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">BIRTHDAY
            </th>
            <th class="border text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">AGE</th>
            <th class="border text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">CLUSTER</th>
          </tr>
        </thead>
        <tbody class="">
          @foreach ($older_members as $item)
            <tr>
              <td class="border text-gray-600  px-3 whitespace-nowrap py-1">{{ $item->name }}</td>
              <td class="border text-gray-600  px-3 whitespace-nowrap py-1">
                {{ $item->replacement->name ?? '' }}
              </td>
              <td class="border text-gray-600  px-3 whitespace-nowrap py-1">  {{ \Carbon\Carbon::parse($item->birthday)->format('F d, Y') }}
              </td>
              <td class="border text-gray-600  px-3 py-1 whitespace-pre-wrap">{{ $item->age ?? '' }}
              </td>
              <td class="border text-gray-600 uppercase  px-3  py-1">{{ $item->cluster ?? '' }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
