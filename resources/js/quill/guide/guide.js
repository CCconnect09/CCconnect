import { quillTextEditor } from "../../quill";

const configs = [["link", "image", "video"]];
quillTextEditor("#editor", "body", "guide", undefined, undefined, configs);
