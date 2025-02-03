<x-modal {{ $attributes }}>
    <x-slot name="title">
        <h1 class="text-lg font-semibold p-4 text-gray-700">
            Excel Operasyonları
        </h1>
    </x-slot>
    <x-slot name="body">
        <div class="p-6" x-on:close-excel-modal.window="excelModal = false">
            <div class="flex flex-col gap-2" x-data="{ displayText: '(Excel dosyası yükleyin)' }">
                <h3 class="font-medium text-gray-700">
                    İçeri Aktar <span class="text-xs font-normal text-gray-500" x-text="displayText">(Excel dosyası
                        yükleyin)</span>
                </h3>
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    x-on:cancel-upload.window="uploading = false; progress = 0; displayText = '(Excel dosyası yükleyin)'">
                    <div class="flex items-center font-semibold gap-2" x-cloak x-show="progress == 100 && !uploading">
                        <button type="button" wire:click="importCustomers" wire:loading.attr="disabled"
                            class="bg-green-500 w-3/4 text-white px-4 py-2 rounded hover:bg-green-700 disabled:hover:bg-green-500">
                            <span wire:loading.remove wire:target="importCustomers">
                                Dosyayı Aktar
                            </span>
                            <span wire:loading wire:target="importCustomers">
                                Aktarılıyor...
                            </span>
                        </button>
                        <button type="button" x-cloak x-show="progress == 100"
                            class="bg-red-500 w-1/4 text-white px-4 py-2 rounded hover:bg-red-700"
                            x-on:click="$dispatch('cancel-upload')">
                            İptal
                        </button>
                    </div>
                    <input type="file" id="excelImport" wire:model="customersFile"
                        x-show="progress != 100 && !uploading" x-on:change="displayText = $event.target.files[0].name"
                        class="p-2 w-full text-slate-500 text-sm rounded leading-6 file:bg-green-200 file:text-green-700 file:font-semibold file:border-none file:px-4 file:py-1 file:mr-1 file:rounded hover:file:bg-green-100 border border-gray-200">
                    <div class="mt-2 relative w-full h-5 overflow-hidden rounded-full bg-neutral-100"
                        x-show="uploading">
                        <span :style="'width:' + progress + '%'"
                            class="absolute w-24 h-full duration-300 ease-linear bg-green-500" x-cloak></span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 mt-3">
                <h3 class="font-medium text-gray-700">
                    Dışarı Aktar <span class="text-xs font-normal text-gray-500">(Excel dosyası oluşturun)</span>
                </h3>
                <button type="button" wire:click="exportCustomers"
                    class="bg-green-500 text-white font-semibold px-4 py-2 rounded hover:bg-green-700">
                    Oluştur
                </button>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="bg-gray-50 p-6 flex items-center justify-end">
            <button x-on:click="excelModal = false" type="button"
                class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600">
                Kapat
            </button>
        </div>
    </x-slot>
</x-modal>
