<div x-data="fileUpload()">
    <div class="flex flex-col justify-center items-center h-screen bg-slate-200 relative "
         x-on:drop="isDropping = false"
         x-on:drop.prevent="handleFileDrop($event)"
         x-on:dragover.prevent="isDropping = true"
         x-on:dragleave.prevent="isDropping = false"
         :class="isDropping ? '[&>*]:pointer-events-none' : ''"
    >
        <div class="absolute top-0 bottom-0 left-0 right-0 bg-blue-500 opacity-90 flex justify-center items-center z-30"
             x-show="isDropping"
        >
            <span class="text-white text-3xl">Release file to upload!</span>
        </div>
        <label class="w-1/2 h-1/2 bg-white border rounded-2xl
                      select-none
                      shadow flex flex-col justify-center
                      items-center cursor-pointer hover:bg-slate-50"
            for="file-upload"
        >
            <h3 class="text-3xl">Click here to select files to upload</h3>
            <em class="italic text-slate-400">(Or drag files to the page)</em>

            <div
                class="bg-gray-200 h-[2px] w-1/2 mt-3"
            >
                <div
                    class="bg-blue-500 h-[2px]"
                    style="transition: width 1s"
                    :style="`width: ${progress}%;`"
                    x-show="isUploading"
                >
                </div>
            </div>
        </label>
        @if(count($files))
            <ul class="list-disc mt-5">
                @foreach($files as $file)
                    <li>
                        {{$file->getClientOriginalName()}}
                        <button class="text-red-500" @click="removeUpload('{{$file->getFilename()}}')">X</button>
                    </li>
                @endforeach
            </ul>
        @endif
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 border rounded p-3 mt-10">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="file" id="file-upload" multiple @change="handleFileSelect" class="hidden" />
    </div>
    <script>
        function fileUpload() {
            return {
                isDropping: false,
                isUploading: false,
                progress: 0,
                handleFileSelect(event) {
                    if (event.target.files.length) {
                        this.uploadFiles(event.target.files)
                    }
                },
                handleFileDrop(event) {
                    if (event.dataTransfer.files.length > 0) {
                        this.uploadFiles(event.dataTransfer.files)
                    }
                },
                uploadFiles(files) {
                    const $this = this;
                    this.isUploading = true
                    @this.uploadMultiple('files', files,
                        function (success) {
                            $this.isUploading = false
                            $this.progress = 0
                        },
                        function(error) {
                            console.log('error', error)
                        },
                        function (event) {
                            $this.progress = event.detail.progress
                        }
                    )
                },
                removeUpload(filename) {
                    @this.removeUpload('files', filename)
                },
            }
        }
    </script>
</div>
