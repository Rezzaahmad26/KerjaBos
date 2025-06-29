<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Verifikasi Topup Connect
        </h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold mb-5">Daftar Topup Connect</h3>

            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Nama Freelancer</th>
                        <th class="px-4 py-2">Jumlah Connect</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Bukti Transfer</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topups as $topup)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $topup->user->name }}</td>
                            <td class="px-4 py-2">{{ $topup->connect_amount }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($topup->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                @if ($topup->payment_proof)
                                    <a href="{{ asset('storage/' . $topup->payment_proof) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                                @else
                                    <span class="text-red-500">Belum Upload</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if (!$topup->is_paid)
                                    <form method="POST" action="{{ route('admin.connect.topups.approve', $topup->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded">
                                            Setujui
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600">Disetujui</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
