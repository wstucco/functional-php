<?php
/**
 * Copyright (C) 2011-2013 by Lars Strojny <lstrojny@php.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Functional;

/**
 * Looks through each element in the collection, returning the first one that passes a truthy test (callback). The
 * function returns as soon as it finds an acceptable element, and doesn't traverse the entire collection. Callback
 * arguments will be element, index, collection
 *
 * @param \Traversable|array $collection
 * @param callable $callback
 * @return mixed
 */
function first($collection, $callback = null)
{
    Exceptions\InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    if ($callback !== null) {
        Exceptions\InvalidArgumentException::assertCallback($callback, __FUNCTION__, 2);
    }

    foreach ($collection as $index => $element) {

        if ($callback === null) {
            return $element;
        }

        if (call_user_func($callback, $element, $index, $collection)) {
            return $element;
        }

    }
}
