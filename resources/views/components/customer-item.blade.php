@props(['fieldType', 'customerId'])
<td x-data="{
    showInput: false,
    contentWidth: 'auto',
    value: '{{ $value }}',
    customerId: '{{ $customerId }}',
    updateValue() {
        Toaster.info('Müşteri bilgisi güncelleniyor...');
        $wire.call('updateValue', '{{ $customerId }}', '{{ $fieldType }}', this.$refs.input.value);
    },
}" x-on:click.away="showInput = false" class="px-6 py-4 break-words text-sm text-gray-900">
    <div class="relative">
        <span :class="{ 'text-gray-400': value.trim() === '' }" x-on:click="showInput = true"
            x-init="contentWidth = $el.offsetWidth + 10 + 'px'" class="cursor-pointer">
            <span>{{ trim($value) ? $value : 'N/A' }}</span>
        </span>
        <template x-if="showInput">
            <input x-model="value" x-ref="input" x-on:keydown.enter="updateValue(); showInput = false"
                x-on:keydown.escape="showInput = false; value = '{{ $value }}'" type="text"
                x-bind:style="'width: ' + contentWidth"
                class="absolute inset-0 border border-gray-300 rounded text-xs shadow-sm focus:ring-indigo-500 focus:border-indigo-500 outline-none sm:text-sm">
        </template>
    </div>
</td>
