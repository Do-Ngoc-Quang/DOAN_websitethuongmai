part of dart._engine;
// Copyright 2013 The Flutter Authors. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/// A monotonically increasing frame number being rendered.
///
/// Used for debugging only.
int debugFrameNumber = 1;

List<FrameReference<dynamic>> frameReferences = <FrameReference<dynamic>>[];

/// A temporary reference to a value of type [V].
///
/// The value automatically gets set to null after the current frame is
/// rendered.
///
/// It is useful to think of this as a weak reference that's scoped to a
/// single frame.
class FrameReference<V> {
  /// Creates a frame reference to a value.
  FrameReference([this.value]) {
    frameReferences.add(this);
  }

  /// The current value of this reference.
  V? value;
}

/// Cache where items cached before frame(N) is committed, can be reused in
/// frame(N+1) and are evicted if not.
///
/// A typical use case is image elements. As images are created and added to
/// DOM whe