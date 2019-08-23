<?php
#s, S, i, I, l, L, f, d都没有对应的大端序和小端序的格式化字符

define('BIG_ENDIAN', pack('L', 1) === pack('N', 1));

if (BIG_ENDIAN)
{
    echo "big endian";
}
else
{
    echo "small endian";
}


// 有符号16位整型大端序
function pack_int16s_be($num)
{
    if (BIG_ENDIAN)
    {
        return pack("s", $num);
    }

    return strrev(pack("s", $num));
}

// 有符号16位整型小端序
function pack_int16_le($num)
{
    if (BIG_ENDIAN)
    {
        return strrev(pack("s", $num));
    }

    return pack("s", $num);
}
