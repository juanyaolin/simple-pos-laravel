<?php

namespace App\Enums;

enum MediaCustomPropertyEnum: string
{
    /** 原始檔案名稱 */
    case ORIGINAL_FILE_NAME = 'original_file_name';

    /** 寬度 */
    case WIDTH = 'width';

    /** 高度 */
    case HEIGHT = 'height';
}
