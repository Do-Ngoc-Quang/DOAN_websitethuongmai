// Copyright (c) 2013, the Dart project authors.  Please see the AUTHORS file
// for details. All rights reserved. Use of this source code is governed by a
// BSD-style license that can be found in the LICENSE file.

part of dart.convert;

/// Open-ended Encoding enum.
abstract class Encoding extends Codec<String, List<int>> {
  const Encoding();

  /// Returns the encoder from `String` to `List<int>`.
  ///
  /// It may be stateful and should not be reused.
  Converter<String, List<int>> get encoder;

  /// Returns the decoder of `this`, converting from `List<int>` to `String`.
  ///
  /// It may be stateful and should not be reused.
  Converter<List<int>, String> get decoder;

  Future<String> decodeStream(Stream<List<int>> byteStream) {
    return decoder
        .bind(byteStream)
        .fold(StringBuffer(),
            (StringBuffer buffer, String stri