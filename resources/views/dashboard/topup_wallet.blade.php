<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Topup Wallet') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-row gap-x-5 items-center">
                        <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#292D32"/>
                            <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#292D32"/>
                            <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#292D32"/>
                            <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#292D32"/>
                            <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#292D32"/>
                            </svg>
                            <div>
                                <p class="text-slate-500 text-sm">Total Balance</p>
                                <h3 class="text-indigo-950 text-xl font-bold">Rp 0</h3>
                            </div>
                    </div>
                </div>
                <hr class="my-5">

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold mb-5">Send Payment to:</h3>
            <div class="flex flex-row gap-x-10">
                <div>
                    <p class="text-slate-500 text-sm">Bank</p>
                    <h3 class="text-indigo-950 text-xl font-bold">Rezza Bank</h3>
                </div>
                <div>
                    <p class="text-slate-500 text-sm">No Account</p>
                    <h3 class="text-indigo-950 text-xl font-bold">08123092093</h3>
                </div>
                <div>
                    <p class="text-slate-500 text-sm">Account Name</p>
                    <h3 class="text-indigo-950 text-xl font-bold">Kerja Bos Indonesia</h3>
                </div>
            </div>

                </div>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">Confirm Topup Wallet</h3>
                <form method="POST" action="{{route('dashboard.wallet.topup.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="amount" :value="__('amount')" />
                        <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus autocomplete="amount" />
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="proof" :value="__('proof')" />
                        <x-text-input id="proof" class="block mt-1 w-full" type="file" name="proof" required autofocus autocomplete="proof" />
                        <x-input-error :messages="$errors->get('proof')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Confirm Topup
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
