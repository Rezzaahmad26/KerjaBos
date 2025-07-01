<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Verifikasi Topup Connect</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if(session('success'))
                <div class="p-4 mb-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Freelancer</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Bukti Transfer</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topups as $topup)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $topup->user->name }}</td>
                            <td class="px-4 py-2">{{ $topup->connect_amount }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($topup->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                @if ($topup->payment_proof)
                                    <img src="{{ asset('storage/' . $topup->payment_proof) }}" alt="Bukti Transfer" class="w-32 h-auto rounded">
                                @else
                                    <span class="text-sm text-gray-500 italic">Belum diunggah</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if(!$topup->is_paid)
                                    <form method="POST" action="{{ route('admin.connect.topups.approve', $topup->id) }}">
                                        @csrf @method('PUT')
                                        <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded">
                                            <span class="text-sm">Setujui</span>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 italic">Sudah disetujui</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4">Belum ada topup connect</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
