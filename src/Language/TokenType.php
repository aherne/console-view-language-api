<?php

namespace Lucinda\ConsoleViewLanguage\Language;

enum TokenType
{
    case TEXT;
    case OPEN_TAG;
    case CLOSE_TAG;
    case SELF_CLOSING_TAG;
}
