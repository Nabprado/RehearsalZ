import { RealTimeBPMAnalyzer } from '/node_modules/realtime-bpm-analyzer/src/realtime-bpm-analyzer.js';

// Create new instance of AudioContext
const audioContext = new AudioContext();
// Set the source with the HTML Audio Node
const source = audioContext.createMediaElementSource(document.getElementById('track'));
// Set the scriptProcessorNode to get PCM data in real time
const scriptProcessorNode = audioContext.createScriptProcessor(4096, 1, 1);
// Connect everythings together
scriptProcessorNode.connect(audioContext.destination);
source.connect(scriptProcessorNode);
source.connect(audioContext.destination);


const onAudioProcess = new RealTimeBPMAnalyzer({
    scriptNode: {
        bufferSize: 4096
    },
    pushTime: 2000,
    pushCallback: (err, bpm) => {
        console.log('bpm', bpm);
    }
});
// Attach realTime function to audioprocess event.inputBuffer (AudioBuffer)
scriptProcessorNode.onaudioprocess = (e) => {
    onAudioProcess.analyze(e);
};