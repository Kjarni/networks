<?php

/**
 * Copyright (c) 2013 Gunnar Guðvarðarson, Gabríel Arthúr Pétursson
 * 
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

class IPv6Network extends Network
{
	protected $length = 128;
	protected $sprintf_padder = "%0128s";
	
	protected function setAddress($address)
	{
		$this->address = gmp_init(ip2long6($address));
	}

	public function formatAddress($address)
	{
		return long2ip6($address);
	}

	protected function verifyAddress($address)
	{
		$flags = array('flags' => FILTER_FLAG_IPV6);
		
		return filter_var($address, FILTER_VALIDATE_IP, $flags);
	}
}
