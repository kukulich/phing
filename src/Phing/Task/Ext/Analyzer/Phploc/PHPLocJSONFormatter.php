<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://phing.info>.
 */

namespace Phing\Task\Ext\Analyzer\Phploc;

use Phing\Exception\BuildException;
use SebastianBergmann\PHPLOC\Log\Json;

/**
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 * @package phing.tasks.ext.phploc
 */
class PHPLocJSONFormatter extends AbstractPHPLocFormatter
{
    public function printResult(array $count, $countTests = false)
    {
        if (class_exists('\\SebastianBergmann\\PHPLOC\\Log\\Json')) {
            $printer = new Json();
        } else {
            throw new BuildException('Not supported PHPLOC version used.');
        }
        $printer->printResult($this->getToDir() . DIRECTORY_SEPARATOR . $this->getOutfile(), $count);
    }
}
