<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Mail, Github, Linkedin } from 'lucide-vue-next';
import meImage from '../../../images/cv/me.png'; //Problem matic, @/ leads to resources/js,
import scrumSvg from '../../../images/cv/Scrumbadge.svg';
import AppLayout from '@/layouts/AppLayout.vue';

onMounted(() => {
    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    obs.unobserve(entry.target); // stop observing after first trigger
                }
            });
        },
        {
            threshold: 0.2, // require 20% visibility to trigger
        }
    );

    document.querySelectorAll('.scroll-in').forEach((el) => {
        observer.observe(el);
    });
});
</script>

<template>
    <Head title="Mijn CV" />

    <AppLayout>
        <div class="relative min-h-screen">
            <div
                class="absolute top-0 bottom-0 left-0 z-0 w-1 bg-[linear-gradient(to_bottom,transparent,red_15%,red_85%,transparent)] sm:left-60"
            ></div>

            <div class="relative z-10 mx-auto max-w-6xl space-y-1 py-1">
                <h1 class="text-5xl sm:text-7xl lg:text-9xl">
                    Curriculum vitae
                </h1>

                <h2 class="text-4xl">Geert Houtepen</h2>
                <div class="flex gap-4">
                    <a
                        href="mailto:geerthoutepen@gmail.com"
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-neutral-900 text-white transition-colors duration-300 hover:bg-red-600"
                    >
                        <Mail class="h-5 w-5" />
                    </a>

                    <a
                        href="https://github.com/ghoutepen"
                        target="_blank"
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-neutral-900 text-white transition-colors duration-300 hover:bg-red-600"
                    >
                        <Github class="h-5 w-5" />
                    </a>

                    <a
                        href="https://github.com/FuryMcFlurry"
                        target="_blank"
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-neutral-900 text-white transition-colors duration-300 hover:bg-red-600"
                    >
                        <Github class="h-5 w-5" />
                    </a>

                    <a
                        href="https://linkedin.com/in/geert-houtepen-b694a316b/"
                        target="_blank"
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-neutral-900 text-white transition-colors duration-300 hover:bg-red-600"
                    >
                        <Linkedin class="h-5 w-5" />
                    </a>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="p-2 md:w-1/3">
                        <img
                            :src="meImage"
                            alt="Photo of me"
                            width="441"
                            height="550"
                            class="max-w-full rounded-lg shadow-md"
                        />
                    </div>
                    <div class="p-2 md:w-2/3">
                        <h3 class="text-2xl">Over mij</h3>
                        <p class="mb-5">
                            Mijn naam is Geert Houtepen, ik ben een ervaren
                            PHP-developer met uitgebreide kennis van het
                            Laravel-framework. Daarnaast beschik ik over
                            uitstekende grafische design vaardigheden en besteed
                            ik mijn avonden regelmatig aan game development van
                            mijn eigen visual novel.
                        </p>
                        <p class="mb-5">
                            Al vanaf jonge leeftijd ben ik gefascineerd door
                            technologie en softwareontwikkeling. Mijn eerste
                            ervaring met programmeren heb ik opgedaan met HTML
                            en CSS, dit betrof vooral het bekijken en aanpassen
                            van code van anderen. Na verloop van tijd ben ik
                            zelf gaan programmeren in PHP. Dankzij mijn
                            opleiding Applicatie- en Mediaontwikkelaar heb ik
                            specifiek kennis opgedaan met het Laravel framework
                            en later met JavaScript en VueJS. Deze kennis en
                            ervaring kon ik verder in praktijk brengen bij de
                            bedrijven waar ik de afgelopen jaren heb mogen
                            werken.
                        </p>
                        <p>
                            Ik heb de drive om mezelf continu verder te
                            ontwikkelen. Zo ben ik in de avonduren graag bezig
                            met het ontwikkelen van mijn eigen visual novel in
                            Godot Engine, gebruik makend van graphics die ik
                            zelf maak.
                        </p>

                        <div class="flex-auto p-2 pt-5">
                            <h3 class="text-2xl">Code skills</h3>
                            <div class="flex gap-10">
                                <ul class="md:w-1/3">
                                    <li>HTML(5)</li>
                                    <li>CSS(3)</li>
                                    <li>Laravel</li>
                                    <li>VueJS</li>
                                </ul>
                                <ul class="md:w-1/3">
                                    <li>PHP</li>
                                    <li>MySQL</li>
                                    <li>JSON</li>
                                    <li>Git</li>
                                </ul>
                                <ul class="md:w-1/3">
                                    <li>AJAX</li>
                                    <li>Bootstrap</li>
                                    <li>Javascript</li>
                                    <li>Typoscript</li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="text-2xl">Certificering</h3>
                        <div class="flex">
                            <div class="w-30 flex-none p-2">
                                <a
                                    href="https://www.scrum.org/user/1597622"
                                    target="_blank"
                                >
                                    <img
                                        :src="scrumSvg"
                                        alt="Photo of me"
                                        width="441"
                                        height="550"
                                        class="max-w-full rounded-lg shadow-md"
                                    />
                                </a>
                            </div>
                            <div class="w-50 flex-auto p-2">
                                <h3 class="text-2xl">
                                    Professional Scrum Master I (PSM I)
                                </h3>
                                Behaald in 2025, zie
                                <a
                                    class="underline"
                                    href="https://www.scrum.org/user/1597622"
                                    target="_blank"
                                >
                                    deze pagina.</a
                                >
                            </div>
                        </div>
                        <h3 class="text-2xl">
                            Ervaring met de volgende applicaties
                        </h3>
                        <div class="flex gap-15">
                            <ul>
                                <li>Word</li>
                                <li>Excel</li>
                                <li>PowerPoint</li>
                                <li>Outlook</li>
                            </ul>
                            <ul>
                                <li>Visio</li>
                                <li>Visual Studio 2017</li>
                                <li>PHPStorm</li>
                                <li>Sublime Text</li>
                            </ul>
                            <ul>
                                <li>Godot Engine 4</li>
                                <li>AceSprite</li>
                                <li>Paint.net</li>
                                <li>After Effects</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-4xl space-y-1 py-1">
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2025</h2>

                    <h3 class="text-2xl">MaxServ - PHP Developer</h3>
                    <h5 class="mb-2 text-xs">Maart 2025 - April 2026</h5>
                    <ul>
                        <li>
                            Verwerkte meerdere Jira-tickets voor de
                            <b>upgrade van TYPO3 10 naar TYPO3 12</b> door inzet
                            van Rector en Fractor (TYPO3-specifieke
                            refactorings).
                        </li>
                        <li>
                            Ontwikkelde en implementeerde extra elementen en
                            functionaliteit zodat het <b>CMS</b> de nieuwe
                            features automatisch kan verwerken.
                        </li>
                        <li>
                            <b>Richtte websites in middels TYPO3-backend</b> op
                            basis van opdrachten vanuit de product owner.
                        </li>
                        <li>
                            Behaalde
                            <b>Professional Scrum Master I (PSM I)</b> en hield
                            dagelijkse standup’s.
                        </li>
                        <li>
                            Werkt op <b>macOS</b> en gebruikte tooling zoals
                            Homebrew, Docker, Skaffold, Ingress, Bitbucket,
                            Bamboo, Satis en Helm
                            <b
                                >ter ondersteuning van de workflows en
                                development</b
                            >.
                        </li>
                        <li>
                            <b>Automatiseerde deployments</b> van testomgevingen
                            via Bamboo, waardoor testen per Jira-ticket
                            eenvoudiger en betrouwbaarder werd.
                        </li>
                    </ul>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2023</h2>

                    <h3 class="text-2xl">ITEC BV - PHP Developer</h3>
                    <h5 class="mb-2 text-xs">Oktober 2023 - December 2024</h5>
                    <ul>
                        <li>
                            Refacteerde een legacy <b>PHP</b> 7.0-portaal voor
                            printeroperaties en verwijderde hardcoded
                            databaseverbindingen door een gecentraliseerd
                            config.php-bestand te implementeren, wat eenvoudige
                            aanpassing mogelijk maakt voor vier verschillende
                            bedrijfsonderdelen.
                        </li>
                        <li>
                            Vertaalde het portaal naar Frans, Engels, Nederlands
                            en Duits, gebruikmakend van <b>vertaaltools</b> om
                            internationale ondersteuning te bieden.
                        </li>
                        <li>
                            Een vereenvoudigde PDF-generatie binnen het portaal
                            door verouderde methodes te vervangen met
                            <b>DomPDF</b>, wat betrouwbaarheid en consistentie
                            verbetert.
                        </li>
                        <li>
                            Organiseerde het project in <b>GitHub</b> om ervoor
                            te zorgen dat toekomstige bedrijfsonderdelen
                            eenvoudig opgezet konden worden en implementeerde
                            bugfixes en foutafhandeling, waarbij fouten op een
                            gestructureerde manier werden gelogd voor betere
                            probleemoplossing.
                        </li>
                        <li>
                            Verbeterde de frontend van het portaal, gebouwd met
                            <b>Angular</b>, om een schonere en onderhoudbare
                            codebase te ondersteunen en de functionaliteit voor
                            eindgebruikers te verbeteren.
                        </li>
                    </ul>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2020</h2>

                    <h3 class="text-2xl">
                        MyComplyNow - PHP Laravel Developer
                    </h3>
                    <h5 class="mb-2 text-xs">Oktober 2020 - September 2023</h5>
                    <ul>
                        <li>
                            <b>Bijnaam "Webdestroyer"</b> gekregen vanwege
                            vaardigheid in het opsporen van bugs. Identificeerde
                            meerdere bugs door de applicatie systematisch te
                            testen, zorgvuldig stappen te documenteren om
                            problemen opnieuw te creëren, en deze aan het
                            ontwikkelingsteam door te geven om de
                            productstabiliteit en gebruikerservaring te
                            verbeteren.
                        </li>
                        <li>
                            Werkte verders mee aan de ontwikkeling van de
                            primaire webapplicatie van MyComplyNow, gebouwd met
                            het <b>Laravel-framework</b>. Tijdens het eerste
                            jaar vooral gefocust op het opzetten van de back-end
                            functies van de applicatie.
                        </li>
                        <li>
                            Schreef tickets in <b>Jira</b> om de wensen van het
                            Sales-team te realiseren.
                        </li>
                        <li>
                            Deelname aan dagelijkse <b>scrum-meetings</b> om de
                            planning voor de webapplicaties door te nemen.
                        </li>
                        <li>
                            Ontwikkelde website-elementen waarmee landen
                            gecontroleerd worden op <b>Wwft-risico’s</b> voor
                            klanten, gebruikmakend van <b>Vue.js</b> en
                            <b>Axios-calls</b> naar de back-end voor diverse
                            API-responses.
                        </li>
                        <li>
                            Onderhield communicatie met klanten over technische
                            fouten in de webapplicatie.
                        </li>
                        <li>
                            Schreef <b>Dusk-tests</b> voor automatische tests,
                            met als doel het minimaliseren van handmatige tests
                            en het verbeteren van de betrouwbaarheid.
                        </li>
                        <li>
                            Ontwikkelde een visualisatietool voor de Corruptie
                            Index met <b>Vue.js</b> binnen een
                            <b>Laravel</b>-omgeving, waarbij corruptiescores per
                            land werden weergegeven op een schaal van 0 tot 100
                            met een interactieve balkinterface.
                        </li>
                        <li>
                            Werkte nauw samen met belanghebbenden om
                            <b>vereisten</b>
                            te <b>verfijnen</b>, nauwkeurige
                            informatiehuishouding te waarborgen, inclusief
                            voortdurende communicatie om het concept van de
                            Corruptie Index te verduidelijken.
                        </li>
                        <li>
                            Bouwde <b>modellen en controllers</b> waarmee
                            beheerders dynamisch landscores konden bijwerken en
                            implementeerde functies waarmee gebruikers in
                            realtime updates konden zien bij het selecteren van
                            verschillende landen.
                        </li>
                    </ul>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2020</h2>

                    <h3 class="text-2xl">
                        Contact Center Nederland - Junior Applicatie Beheerder -
                        Stage
                    </h3>
                    <h5 class="mb-2 text-xs">Oktober 2019 - Maart 2020</h5>
                    <ul>
                        <li>
                            Werkte met de <b>3CX API</b> om een
                            <b>PHP</b>-gebaseerde website te ontwikkelen waarmee
                            een manager de oproepen van het callcenter kon
                            monitoren.
                        </li>
                        <li>
                            Onderhield samen met een team de beveiliging van de
                            website.
                        </li>
                        <li>
                            Verzamelde eerste ervaring met het werken met
                            <b>API’s</b>
                        </li>
                    </ul>

                    <h3 class="pt-10 text-2xl">
                        Cad-Visie - Junior Applicatie Beheerder - Stage
                    </h3>
                    <h5 class="mb-2 text-xs">Maart 2019 - Augustus 2019</h5>
                    <ul>
                        <li>
                            Beheerde een <b>inhouse webapplicatie</b>,
                            geschreven in <b>Laravel</b>, met focus op de
                            <b>back-end</b>.
                        </li>
                        <li>
                            Ontwikkelde een <b>nieuwe functie</b> voor het
                            berekenen van de <b>succesratio per dag</b>, waarmee
                            in één oogopslag te zien was hoeveel opdrachten er
                            waren en hoeveel er gemiddeld per dag werden
                            afgerond.
                        </li>
                        <li>
                            Pas <b>WordPress-websites</b> aan op basis van
                            klantwensen, leerde het aanpassen van de site en het
                            beheren van plugins.
                        </li>
                    </ul>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">Opleidingen</h2>

                    <div class="mb-8">
                        <h3 class="text-2xl">
                            MBO Niveau 4 Applicatie- en Mediaontwikkelaar
                        </h3>
                        <h5 class="text-xs">2017 – 2020</h5>
                        <p>Radius College, Breda</p>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-2xl">
                            MBO Niveau 3 Medewerker Boomteelt
                        </h3>
                        <h5 class="text-xs">2014 – 2015</h5>
                        <p>Prinsentuin College, Breda</p>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-2xl">
                            MBO Niveau 2 Medewerker Beheer ICT
                        </h3>
                        <h5 class="text-xs">2011 – 2014</h5>
                        <p>Zoomvliet College, Roosendaal</p>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-2xl">VMBO-Basis</h3>
                        <h5 class="text-xs">2007 – 2011</h5>
                        <p>Prinsentuin College, Oudenbosch</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
