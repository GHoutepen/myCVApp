<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Mail, Github, Linkedin } from 'lucide-vue-next';
import { ref, onMounted } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import godotVid from '../../../images/cv/Godot1.webm';
import godotVid2 from '../../../images/cv/Godot2.webm';
import meImage from '../../../images/cv/me.png'; //Problem matic, @/ leads to resources/js,

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
    <Head title="Mijn Hobbies" />

    <AppLayout>
        <div class="relative min-h-screen">
            <div
                class="absolute top-0 bottom-0 left-0 z-0 w-1 bg-[linear-gradient(to_bottom,transparent,red_15%,red_85%,transparent)] sm:left-60"
            ></div>

            <div class="relative z-10 mx-auto max-w-6xl space-y-1 py-1">
                <h1 class="text-5xl sm:text-7xl lg:text-9xl">Hobbies</h1>

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
                        Naast mijn werk als webdeveloper investeer ik
                        structureel tijd in eigen projecten. Ik gebruik
                        hobbyprojecten om nieuwe technologieën te verkennen,
                        mijn probleemoplossend vermogen te verdiepen en mijn
                        technische grenzen te verleggen. Hieronder een selectie
                        van projecten waarin ontwikkeling, experiment en
                        creativiteit samenkomen.
                    </div>
                </div>
            </div>

            <div class="relative z-10 mx-auto max-w-4xl space-y-1 py-1">
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2024</h2>

                    <h3 class="text-2xl">VueFlow</h3>
                    <p>
                        Ontwikkeling en testing van een interactief nodeboard
                        met VueFlow. Dit project richtte zich op het visueel
                        modelleren van logica en vertakkingen.
                    </p>
                    <img
                        src="../../../images/cv/nodebit.png"
                        height="889"
                        width="1906"
                    />
                    <img
                        src="../../../images/cv/nodeOutput.png"
                        height="814"
                        width="947"
                    />
                    <p>
                        Daarnaast werkte ik aan een visual-novelachtig concept
                        waarbij keuzes directe invloed hebben op het verdere
                        verloop van het verhaal.
                    </p>
                    <img
                        src="../../../images/cv/visual2.png"
                        height="530"
                        width="945"
                    />
                    <img
                        src="../../../images/cv/visual.png"
                        height="530"
                        width="943"
                    />
                    <p>
                        De nadruk lag op structuur, state-management en
                        uitbreidbaarheid van het systeem. Het project combineert
                        frontend-architectuur met narratieve logica.

                        <a
                            class="underline"
                            href="https://github.com/FuryMcFlurry/visualNodeStoryBit/pulls"
                        >
                            Klik hier voor de Github Pagina.</a
                        >
                    </p>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2022-2024</h2>

                    <h3 class="text-2xl">Gameontwikkeling met Godot Engine</h3>
                    <p>
                        Ontwikkeling van een eigen visual novel binnen een
                        3D-omgeving. Het project begon als een kopie van een
                        spel genre; Murder Mystery.
                        <br />
                        Een visual novel novel met een mix van point-and-click
                        perspectief. En verders FPS-mechanieken, om de omgeving
                        te kunnen bekijken. De omgeving is volledig 3D
                        opgebouwd, voor gebruik gemaakt van gratis modellen.
                        <br />
                        Verders personages en visuele elementen gebruikmaken van
                        2.5D-sprites (placeholder stockfoto’s). Puur om een
                        verticale slice to kunnen maken.
                    </p>

                    <video controls preload="metadata" width="100%">
                        <source :src="godotVid2" type="video/webm" />
                        Your browser does not support this video format.
                    </video>

                    <ul>
                        <li>
                            Project maakt gebruikt van GDScript (python lite) en
                            hoofdtaal van de Godot Engine.
                        </li>
                        <li>Hierin de Muziekvisualiser in geschreven.</li>
                        <li>
                            Geluiden gekoppeld aan beweging over verschillende
                            terreintypes.
                        </li>
                        <li>
                            Een dialoogplugin geïntegreerd en uitgebreid kan
                            poses van karakters aanpassen of effects voor of
                            achter deze karakters zetten.
                        </li>
                        <li>
                            2.5D-expressies aangestuurd via de Animation Editor,
                            volledig aangeroepen vanuit dialooginteracties.
                        </li>
                        <li>
                            Eerste stappen gezet in shader development,
                            experimenteel en in vroege fase.
                        </li>
                    </ul>

                    <video controls preload="metadata" width="100%">
                        <source :src="godotVid" type="video/webm" />
                        Your browser does not support this video format.
                    </video>
                </div>
                <div class="scroll-hidden scroll-in p-4 sm:p-12">
                    <h2 class="text-4xl">2021</h2>

                    <h3 class="text-2xl">Binding of Isaac Modificatie</h3>
                    <p>Nieuwe Karakter voor Binding of Isaac.</p>
                    <p>
                        Geschreven in LUA, met samenwerking met twee anderen
                        developers. Hierin was de documentatie doornemen, zelf
                        de assets pixel voor pixel bij elkaar zetten. En
                        natuurlijk het testen en balanceren van gameplay rondom
                        deze karakter.
                        <a
                            class="underline"
                            href="https://steamcommunity.com/sharedfiles/filedetails/?id=2629654093"
                        >
                            Klik hier voor de steam pagina!</a
                        >
                    </p>
                    <a
                        href="https://steamcommunity.com/sharedfiles/filedetails/?id=2629654093"
                    >
                        <img
                            src="../../../images/cv/beira.jpg"
                            height="268"
                            width="268"
                    /></a>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
