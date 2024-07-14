<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import BoldIcon from 'vue-material-design-icons/FormatBold.vue';
import ItalicIcon from 'vue-material-design-icons/FormatItalic.vue';
import StrikethroughIcon  from 'vue-material-design-icons/FormatStrikethrough.vue';
import ParagraphIcon from 'vue-material-design-icons/FormatParagraph.vue';
import Heading1Icon from 'vue-material-design-icons/FormatHeader1.vue';
import Heading2Icon from 'vue-material-design-icons/FormatHeader2.vue';
import Heading3Icon from 'vue-material-design-icons/FormatHeader3.vue';
import Heading4Icon from 'vue-material-design-icons/FormatHeader4.vue';
import Heading5Icon from 'vue-material-design-icons/FormatHeader5.vue';
import Heading6Icon from 'vue-material-design-icons/FormatHeader6.vue';
import BulletedListIcon from 'vue-material-design-icons/FormatListBulleted.vue';
import OrderedListIcon from 'vue-material-design-icons/FormatListNumbered.vue';
import BlockquoteIcon from 'vue-material-design-icons/FormatQuoteOpen.vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true
    }
});

const emit = defineEmits(['update:modelValue'])

const editor = useEditor({
    content: props.modelValue,
    onUpdate: ({ editor }) => {
        emit('update:modelValue', editor.getHTML())
    },
    editorProps: {
        attributes: {
            class: 'border border-gray-400 p-4 min-h-[12rem] max-h-[64rem] overflow-y-auto prose max-w-none focus:outline-none',
        },
    },
    extensions: [StarterKit],
})
</script>
<template>
    <section v-if="editor" class="flex flex-wrap gap-2 py-2">
        <div class="control-group">
            <div class="button-group">
                <button @click="editor.chain().focus().toggleBold().run()"
                    :disabled="!editor.can().chain().focus().toggleBold().run()"
                    :class="{ 'bg-gray-200': editor.isActive('bold') }"
                    class="btn">
                    <BoldIcon :size="20" title="Bold"/>
                </button>
                <button @click="editor.chain().focus().toggleItalic().run()"
                    :disabled="!editor.can().chain().focus().toggleItalic().run()"
                    :class="{ 'bg-gray-200': editor.isActive('italic') }"
                    class="btn">
                    <ItalicIcon :size="20" title="Italic"/>
                </button>
                <button @click="editor.chain().focus().toggleStrike().run()"
                    :disabled="!editor.can().chain().focus().toggleStrike().run()"
                    :class="{ 'bg-gray-200': editor.isActive('strike') }"
                    class="btn">
                    <StrikethroughIcon :size="20" title="Strikethrough"/>
                </button>
                <button @click="editor.chain().focus().setParagraph().run()"
                    :class="{ 'bg-gray-200': editor.isActive('paragraph') }"
                    class="btn">
                    <ParagraphIcon :size="20" title="Paragraph"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 1 }) }"
                    class="btn">
                    <Heading1Icon :size="20" title="Heading 1"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 2 }) }"
                    class="btn">
                    <Heading2Icon :size="20" title="Heading 2"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 3 }) }"
                    class="btn">
                    <Heading3Icon :size="20" title="Heading 3"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 4 }) }"
                    class="btn">
                    <Heading4Icon :size="20" title="Heading 4"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 5 }) }"
                    class="btn">
                    <Heading5Icon :size="20" title="Heading 5"/>
                </button>
                <button @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
                    :class="{ 'bg-gray-200': editor.isActive('heading', { level: 6 }) }"
                    class="btn">
                    <Heading6Icon :size="20" title="Heading 6"/>
                </button>
                <button @click="editor.chain().focus().toggleBulletList().run()"
                    :class="{ 'bg-gray-200': editor.isActive('bulletList') }"
                    class="btn">
                    <BulletedListIcon :size="20" title="Bulleted List"/>
                </button>
                <button @click="editor.chain().focus().toggleOrderedList().run()"
                    :class="{ 'bg-gray-200': editor.isActive('orderedList') }"
                    class="btn">
                    <OrderedListIcon :size="20" title="Ordered List"/>
                </button>
                <button @click="editor.chain().focus().toggleBlockquote().run()"
                    :class="{ 'bg-gray-200': editor.isActive('blockquote') }"
                    class="btn">
                    <BlockquoteIcon :size="20" title="Blockquote"/>
                </button>
            </div>
            <editor-content :editor="editor" />
        </div>
    </section>
    <EditorContent :editor="editor" />
</template>

<style scoped>
.btn {
    padding:.5rem;
    margin: .1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    cursor: pointer;
}
</style>