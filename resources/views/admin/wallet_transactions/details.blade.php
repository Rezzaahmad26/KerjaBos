<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transaction Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <h3 class="text-indigo-950 text-xl font-bold mb-5">
                    {{$walletTransaction->type=== 'Topup' ? 'Topup Details' : 'Withdrawal Details'}}
                </h3>
                <div class="flex flex-row gap-x-5 items-center justify-between">
                    <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#292D32"/>
                        <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#292D32"/>
                        <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#292D32"/>
                        <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#292D32"/>
                        <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#292D32"/>
                        </svg>
                        <div>
                            <p class="text-slate-500 text-sm">Total Amount</p>
                            <h3 class="text-indigo-950 text-xl font-bold">Rp {{number_format($walletTransaction->amount, 0, ',', '.')}}</h3>
                        </div>


                        @if($walletTransaction->is_paid)
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                SUCCESS
                            </span>
                        @else
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                PENDING
                            </span>
                        @endif

                        <div>
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $walletTransaction->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="">
                            <p class="text-slate-500 text-sm">User</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $walletTransaction->user->name }}</h3>
                        </div>
                </div>

            @if($walletTransaction->type == 'Withdraw')
                <hr class="my-5">

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold mb-5">Send Payment to:</h3>
                            <div class="flex flex-row gap-x-10">
                                <div>
                                    <p class="text-slate-500 text-sm">Bank</p>
                                    <h3 class="text-indigo-950 text-xl font-bold">{{$walletTransaction->bank_name}}</h3>
                                </div>
                                <div>
                                    <p class="text-slate-500 text-sm">No Account</p>
                                    <h3 class="text-indigo-950 text-xl font-bold">
                                        {{$walletTransaction->bank_account_number}}
                                    </h3>
                                </div>
                                <div>
                                    <p class="text-slate-500 text-sm">Account Name</p>
                                    <h3 class="text-indigo-950 text-xl font-bold">
                                        {{$walletTransaction->bank_account_name}}
                                    </h3>
                                </div>
                            </div>

                    </div>

                        @if($walletTransaction->is_paid)
                        <hr class="my-5">
                        <h3 class="text-indigo-950 text-xl font-bold mb-5">Proof of Payment</h3>
                        <img src="{{Storage::url($walletTransaction->proof)}}" alt="" class="rounded-2xl object-cover w-[300px] h-[200px] mb-3">
                        @endif
                    <hr class="my-5">

                    @if(!$walletTransaction->is_paid)
                    <h3 class="text-indigo-950 text-xl font-bold">Confirm Withdrawal</h3>
                    <form method="POST" action="{{route('admin.wallet_transactions.update', $walletTransaction)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-4">
                            <x-input-label for="proof" :value="__('proof')" />
                            <x-text-input id="proof" class="block mt-1 w-full" type="file" name="proof" required autofocus autocomplete="proof" />
                            <x-input-error :messages="$errors->get('proof')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Update Withdrawal
                            </button>
                        </div>
                    </form>
                    @endif
            @endif

                @if($walletTransaction->type == 'Topup')
                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold mb-5">Proof of Topup Payment</h3>
                        <img src="{{Storage::url($walletTransaction->proof)}}" alt="" class="rounded-2xl object-cover w-[300px] h-[200px] mb-3">

                    @if(!$walletTransaction->is_paid)
                    <hr class="my-5">
                    <form action="{{route('admin.wallet_transactions.update', $walletTransaction)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Approve Topup
                        </button>
                    </form>
                    @endif
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
