<div class="p-6">
    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <h1 class="text-lg text-center md:text-left md:text-2xl font-semibold text-gray-700">
            Günü Yaklaşan Müşteriler
        </h1>
        <span class="text-orange-400 text-xs text-center md:text-left">
            Sayfa başına 25 kayıttan fazlası uygulamanın performansını olumsuz etkileyebilir.
        </span>
    </div>
    <div class="flex items-center flex-col md:flex-row justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" wire:navigate.hover
                class="text-sm md:text-base bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded my-3">
                Tüm Müşteriler
            </a>
            <a href="{{ route('expired-customers') }}" wire:navigate.hover
                class="text-sm md:text-base bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded my-3">
                Günü Geçenler
            </a>
        </div>
        <div class="flex items-center gap-2">
            <select wire:model.live="sortBy" value="asc"
                class="px-4 py-2 bg-white rounded border border-gray-200 focus:outline-none">
                <option value="asc">
                    En yakın
                </option>
                <option value="desc">
                    En uzak
                </option>
            </select>
            <select wire:model="perPage" x-on:change="$dispatch('update-per-page', {value: $event.target.value})"
                class="px-4 py-2 bg-white rounded border border-gray-200 focus:outline-none">
                <option value="10">
                    Sayfa başına 10
                </option>
                <option value="25">
                    Sayfa başına 25
                </option>
                <option value="50">
                    Sayfa başına 50
                </option>
                <option value="100">
                    Sayfa başına 100
                </option>
            </select>
        </div>
    </div>
    <div class="mb-4 mt-4 md:mt-0">
        {{ $this->customers->links('vendor.pagination.simple') }}
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        TC
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Doğum
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ad Soyad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Plaka</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Belge Seri
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanzim
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Başlangıç
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Bitiş
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Poliçe Türü
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Poliçe No
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Şirket
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telefon
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Notlar
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <svg class="shrink-0 size-5 mr-1.5 -ml-1 text-red-500" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9996 7C12.5519 7 12.9996 7.44772 12.9996 8V12C12.9996 12.5523 12.5519 13 11.9996 13C11.4474 13 10.9996 12.5523 10.9996 12V8C10.9996 7.44772 11.4474 7 11.9996 7ZM12.001 14.99C11.4488 14.9892 11.0004 15.4363 10.9997 15.9886L10.9996 15.9986C10.9989 16.5509 11.446 16.9992 11.9982 17C12.5505 17.0008 12.9989 16.5537 12.9996 16.0014L12.9996 15.9914C13.0004 15.4391 12.5533 14.9908 12.001 14.99Z"
                                fill="currentColor"></path>
                        </svg>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($this->customers as $customer)
                    <tr wire:key="{{ $customer->id }}" class="hover:bg-gray-50">
                        <x-customer-item fieldType="tc" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->tc }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="birth_date" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->birth_date?->format('d.m.Y') }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="name" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->name }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="plate" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->plate }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="document_serial" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->document_serial }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="issue_date" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->issue_date?->format('d.m.Y') }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="start_date" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->start_date?->format('d.m.Y') }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="expiry_date" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->expiry_date?->format('d.m.Y') }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="policy_type" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->policy_type }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="policy_no" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->policy_no }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="company" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->company }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="phone" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->phone }}
                            </x-slot>
                        </x-customer-item>
                        <x-customer-item fieldType="notes" customerId="{{ $customer->id }}">
                            <x-slot name="value">
                                {{ $customer->notes }}
                            </x-slot>
                        </x-customer-item>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                            <button wire:click="deleteCustomer({{ $customer->id }})"
                                wire:confirm="Bu işlemi gerçekleştirmek istediğinize emin misiniz?"
                                class="text-red-500 hover:underline flex items-center justify-center">
                                <x-icons.delete size="18" />
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" class="px-6 py-10 whitespace-nowrap text-sm text-center text-gray-500">
                            Yakın zamanda sigortası sona ermek üzere olan müşteri bulunmamaktadır.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $this->customers->links('vendor.pagination.simple') }}
    </div>
</div>
