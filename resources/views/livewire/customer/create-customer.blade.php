<div>
    <div class="rounded-xl border border-gray-100 bg-white shadow-md p-6">
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-lg font-semibold text-gray-700">Yeni Müşteri Ekle</h1>
            <div>
                <button type="button" wire:click="cleanForm"
                    class="inline-flex items-center justify-center p-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <x-icons.mop size="18" />
                </button>
            </div>
        </div>
        <div class="space-y-5">
            <div class="flex gap-3 flex-col md:flex-row items-center w-full">
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="name" class="text-sm font-medium text-gray-700">
                        Ad Soyad
                    </label>
                    <input type="text" wire:model="name" id="name"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="tc" class="text-sm font-medium text-gray-700">
                        T.C No
                    </label>
                    <input type="text" wire:model="tc" id="tc"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="birth_date" class="text-sm font-medium text-gray-700">
                        Doğum Tarihi
                    </label>
                    <x-date-picker wire:model="birth_date" />
                </div>
            </div>
            <div class="flex gap-3 flex-col md:flex-row items-center w-full">
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="plate" class="text-sm font-medium text-gray-700">
                        Plaka
                    </label>
                    <input type="text" wire:model="plate" id="plate"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="document_serial" class="text-sm font-medium text-gray-700">
                        Belge Seri No
                    </label>
                    <input type="text" wire:model="document_serial" id="document_serial"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
            </div>
            <div class="flex gap-3 flex-col md:flex-row items-center w-full">
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="issue_date" class="text-sm font-medium text-gray-700">
                        Tanzim Tarihi
                    </label>
                    <x-date-picker wire:model="issue_date" />
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="start_date" class="text-sm font-medium text-gray-700">
                        Başlangıç Tarihi
                    </label>
                    <x-date-picker wire:model="start_date" />
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="expiry_date" class="text-sm font-medium text-gray-700">
                        Bitiş Tarihi
                    </label>
                    <x-date-picker wire:model="expiry_date" />
                </div>
            </div>
            <div class="flex gap-3 flex-col md:flex-row items-center w-full">
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="policy_type" class="text-sm font-medium text-gray-700">
                        Poliçe Türü
                    </label>
                    <input type="text" wire:model="policy_type" id="policy_type"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="policy_no" class="text-sm font-medium text-gray-700">
                        Poliçe No
                    </label>
                    <input type="text" wire:model="policy_no" id="policy_no"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="flex flex-col gap-1.5 flex-grow w-full">
                    <label for="company" class="text-sm font-medium text-gray-700">
                        Şirket
                    </label>
                    <input type="text" wire:model="company" id="company"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
            </div>
            <button wire:click="createCustomer" type="button"
                class="w-full py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Müşteriyi Ekle
            </button>
        </div>
    </div>
</div>
