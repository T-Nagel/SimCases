<x-filament-panels::page>
    {{ $this->infolist }}

    <style>
        .fi-section-header {
            padding: 0 !important;
        }
    </style>

    <div x-data="{ activeTab: 'tab1' }">
        <x-filament::section>
            <x-slot name="heading">
                <x-filament::tabs class="w-full" contained="false">
                    <x-filament::tabs.item
                        @click="activeTab = 'tab1'"
                        alpine-active="activeTab === 'tab1'"
                    >
                        Allgemeine Infos
                    </x-filament::tabs.item>

                    <x-filament::tabs.item
                        @click="activeTab = 'tab2'"
                        alpine-active="activeTab === 'tab2'"
                    >
                        Vorbereitung
                    </x-filament::tabs.item>

                    <x-filament::tabs.item
                        @click="activeTab = 'tab3'"
                        alpine-active="activeTab === 'tab3'"
                    >
                        Fallbeispiel
                    </x-filament::tabs.item>

                    <x-filament::tabs.item
                        @click="activeTab = 'tab4'"
                        alpine-active="activeTab === 'tab4'"
                    >
                        Debriefing
                    </x-filament::tabs.item>
                </x-filament::tabs>
            </x-slot>

            {{-- Content --}}
            <div class="mt-6">
                <div x-show="activeTab === 'tab1'" x-cloak>
                    @if($this->getRecord()['name'])
                        <div class="fi-in-entry">
                            <div class="fi-in-entry-label-col">
                                <div class="fi-in-entry-label-ctn">
                                    <dt class="fi-in-entry-label">Name</dt>
                                </div>
                            </div>
                            <div class="fi-in-entry-content-col">
                                <dd class="fi-in-entry-content-ctn">
                                    <div class="fi-in-entry-content">
                                        <div class="fi-size-sm  fi-in-text-item  fi-wrapped  fi-in-text">
                                            {{ $this->getRecord()['name'] }}
                                        </div>
                                    </div>
                                </dd>
                            </div>
                        </div>
                    @endif

                </div>

                <div x-show="activeTab === 'tab2'" x-cloak>
                    @foreach ($this->getRecord()->vorbereitung as $item)
                        @dump($item)
                        @includeIf(
                            'filament.resources.cases.blocks.briefing.' . $item['type'],
                            ['data' => $item['data']]
                        )
                    @endforeach
                </div>

                <div x-show="activeTab === 'tab3'" x-cloak>
                    @foreach ($this->getRecord()->fallbeispiel as $item)
                        @dump($item['type'])
                        @includeIf(
                            'filament.resources.cases.blocks.fallbeispiel.' . $item['type'],
                            ['data' => $item['data']]
                        )
                    @endforeach
                </div>

                <div x-show="activeTab === 'tab4'" x-cloak>
                    @foreach ($this->getRecord()->debriefing as $item)
                        @dump($item['type'])
                        @includeIf(
                            'filament.resources.cases.blocks.debriefing.' . $item['type'],
                            ['data' => $item['data']]
                        )
                    @endforeach
                </div>
            </div>
        </x-filament::section>
    </div>

</x-filament-panels::page>
