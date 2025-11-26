@props(['required' => true, 'name' => 'privacy_agreement', 'wireModel' => null])

<div class="mb-4">
    <label class="flex items-start gap-2 cursor-pointer">
        <input type="checkbox" 
               name="{{ $name }}" 
               value="1"
               @if($wireModel) wire:model="{{ $wireModel }}" @endif
               @if($required) required @endif
               class="mt-1 h-4 w-4 text-[#4BAE37] border-gray-300 rounded focus:ring-[#4BAE37]">
        <span class="text-sm text-gray-700 dark:text-gray-300">
            @if(app()->getLocale() === 'uk')
                Я ознайомлений з <a href="{{ route_locale('privacy-policy') }}" target="_blank" class="text-[#4BAE37] hover:text-[#3c952a] hover:underline">політикою конфіденційності</a> та згоден на обробку моїх даних.
            @elseif(app()->getLocale() === 'ka')
                მე გავეცანი <a href="{{ route_locale('privacy-policy') }}" target="_blank" class="text-[#4BAE37] hover:text-[#3c952a] hover:underline">კონფიდენციალურობის პოლიტიკას</a> და ვეთანხმები ჩემი მონაცემების დამუშავებას.
            @else
                Я ознакомлен с <a href="{{ route_locale('privacy-policy') }}" target="_blank" class="text-[#4BAE37] hover:text-[#3c952a] hover:underline">политикой конфиденциальности</a> и согласен на обработку моих данных.
            @endif
        </span>
    </label>
    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

