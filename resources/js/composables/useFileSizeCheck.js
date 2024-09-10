import { ref } from 'vue';

export function useFileSizeCheck(maxSizeInMB = 1.5) {
  const isFileTooLarge = ref(false);
  const errorMessage = ref('');

  const checkFileSize = (file) => {
    const maxSizeInBytes = maxSizeInMB * 1024 * 1024;
    if (file.size > maxSizeInBytes) {
      isFileTooLarge.value = true;
      errorMessage.value = `File size exceeds ${maxSizeInMB} MB limit.`;
      return false;
    }
    isFileTooLarge.value = false;
    errorMessage.value = '';
    return true;
  };

  return {
    isFileTooLarge,
    errorMessage,
    checkFileSize
  };
}